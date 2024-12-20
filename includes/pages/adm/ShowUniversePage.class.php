<?php

/*
 * ╔══╗╔══╗╔╗──╔╗╔═══╗╔══╗╔╗─╔╗╔╗╔╗──╔╗╔══╗╔══╗╔══╗
 * ║╔═╝║╔╗║║║──║║║╔═╗║║╔╗║║╚═╝║║║║║─╔╝║╚═╗║║╔═╝╚═╗║
 * ║║──║║║║║╚╗╔╝║║╚═╝║║╚╝║║╔╗─║║╚╝║─╚╗║╔═╝║║╚═╗──║║
 * ║║──║║║║║╔╗╔╗║║╔══╝║╔╗║║║╚╗║╚═╗║──║║╚═╗║║╔╗║──║║
 * ║╚═╗║╚╝║║║╚╝║║║║───║║║║║║─║║─╔╝║──║║╔═╝║║╚╝║──║║
 * ╚══╝╚══╝╚╝──╚╝╚╝───╚╝╚╝╚╝─╚╝─╚═╝──╚╝╚══╝╚══╝──╚╝
 *
 * @author Tsvira Yaroslav <https://github.com/Yaro2709>
 * @info ***
 * @link https://github.com/Yaro2709/New-Star
 * @Basis 2Moons: XG-Project v2.8.0
 * @Basis New-Star: 2Moons v1.8.0
 */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class ShowUniversePage extends AbstractAdminPage
{
	public static $requireModule = 0;

	function __construct() 
	{
        if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) throw new Exception("Permission error!");
		parent::__construct();
	}
		
	function show()
	{
        global $LNG, $USER;
	
        $action		= HTTP::_GP('action', '');
        $universe	= HTTP::_GP('uniID', 0);
	
        switch($action)
        {
            case 'open':
                $config = Config::get($universe);
                $config->game_disable = 1;
                $config->save();
            break;
            case 'closed':
                $config = Config::get($universe);
                $config->game_disable = 0;
                $config->save();
            break;
            case 'delete':
                if(!empty($universe) && $universe != ROOT_UNI && $universe != Universe::current())
                {
                    $GLOBALS['DATABASE']->query("DELETE FROM ".ALLIANCE.", ".ALLIANCE_RANK.", ".ALLIANCE_REQUEST." 
                    USING ".ALLIANCE." 
                    LEFT JOIN ".ALLIANCE_RANK." ON ".ALLIANCE.".id = ".ALLIANCE_RANK.".allianceID
                    LEFT JOIN ".ALLIANCE_REQUEST." ON ".ALLIANCE.".id = ".ALLIANCE_REQUEST." .allianceID
                    WHERE ally_universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".BANNED." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".BUDDY.", ".BUDDY_REQUEST."
                    USING ".BUDDY."
                    LEFT JOIN ".BUDDY_REQUEST." ON ".BUDDY.".id = ".BUDDY_REQUEST.".id
                    WHERE ".BUDDY.".universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".CONFIG." WHERE uni = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".DIPLO." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".FLEETS.", ".FLEETS_EVENT.", ".AKS.", ".LOG_FLEETS."
                    USING ".FLEETS."
                    LEFT JOIN ".FLEETS_EVENT." ON ".FLEETS.".fleet_id = ".FLEETS_EVENT.".fleetID
                    LEFT JOIN ".AKS." ON ".FLEETS.".fleet_group = ".AKS.".id
                    LEFT JOIN ".LOG_FLEETS." ON ".FLEETS.".fleet_id = ".LOG_FLEETS.".fleet_id
                    WHERE ".FLEETS.".fleet_universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".MESSAGES." WHERE message_universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".NOTES." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".PLANETS." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".STATPOINTS." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".TICKETS.", ".TICKETS_ANSWER."
                    USING ".TICKETS."
                    LEFT JOIN ".TICKETS_ANSWER." ON ".TICKETS.".ticketID = ".TICKETS_ANSWER.".ticketID
                    WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".TOPKB." WHERE universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".USERS.", ".USERS_ACS.", ".USERS_AUTH.", ".TOPKB_USERS.", ".SESSION.", ".SHORTCUTS.", ".RECORDS."
                    USING ".USERS."
                    LEFT JOIN ".USERS_ACS." ON ".USERS.".id = ".USERS_ACS.".userID
                    LEFT JOIN ".USERS_AUTH." ON ".USERS.".id = ".USERS_AUTH.".id
                    LEFT JOIN ".TOPKB_USERS." ON ".USERS.".id = ".TOPKB_USERS.".uid
                    LEFT JOIN ".SESSION." ON ".USERS.".id = ".SESSION.".userID
                    LEFT JOIN ".SHORTCUTS." ON ".USERS.".id = ".SHORTCUTS.".ownerID
                    LEFT JOIN ".RECORDS." ON ".USERS.".id = ".RECORDS.".userID
                    LEFT JOIN ".LOSTPASSWORD." ON ".USERS.".id = ".LOSTPASSWORD.".userID
                    WHERE ".USERS.".universe = ".$universe.";");
                    $GLOBALS['DATABASE']->query("DELETE FROM ".USERS_VALID." WHERE universe = ".$universe.";");
                    
                    if(Universe::getEmulated() == $universe)
                    {
                        Universe::setEmulated(Universe::current());
                    }
				
                    if(count(Universe::availableUniverses()) == 2)
                    {
                        // Hack The Session
                        setcookie(session_name(), session_id(), SESSION_LIFETIME, HTTP_BASE, NULL, HTTPS, true);
                        HTTP::redirectTo("../admin.php");
                    }
                }
            break;
            case 'create':
                $universeCount = count(Universe::availableUniverses());
                // Check Multiuniverse Support
                $client = new Client([
//                    'timeout' => 10,
                    'allow_redirects' => false,
                    'headers' => [
                        'user-agent' => "Mozilla/5.0 (compatible; 2Moons/".Config::get()->VERSION."; +http://2moons.cc)",
                    ],
                    'verify' => false,
                ]);
                try {
                    $response = $client->request('GET', $universeCount == 1 ? PROTOCOL . HTTP_HOST . HTTP_BASE . "uni" . ROOT_UNI . "/" : PROTOCOL . HTTP_HOST . HTTP_BASE);
                } catch (BadResponseException $e) {
                    $response = $e->getResponse();
                }
                $httpCode	= $response->getStatusCode();
                if($httpCode != 302)
                {
                    $this->printMessage((str_replace(
                        [
                            '{NGINX-CODE}'
                        ],
                        [
                            #'rewrite '.HTTP_ROOT.'uni[0-9]+/?(.*)?$ '.HTTP_ROOT.'$2 break;'
                            'rewrite /(.*)/?uni[0-9]+/?(.*) /$1/$2 break;'
                        ],
                        $LNG->getTemplate('createUniverseInfo')
                    )
                    .'<a href="javascript:window.history.back();"><button class="btn btn-primary">'.$LNG['uvs_back'].'</button></a>
                    '
                    .'<a href="javascript:window.location.reload();"><button class="btn btn-primary">'.$LNG['uvs_reload'].'</button></a>
                    '),
                    true,
                    ['?page=universe', 3600]);

                }

                $config	= Config::get();
			
                $configSQL	= array();
                foreach(Config::getGlobalConfigKeys() as $basicConfigKey)
                {
                    $configSQL[]	= '`'.$basicConfigKey.'` = "'.$config->$basicConfigKey.'"';
                }
			
                $configSQL[]	= '`uni_name` = "'.$LNG['fcm_universe'].' '.($universeCount + 1).'"';
                $configSQL[]	= '`close_reason` = ""';
                $configSQL[]	= '`OverviewNewsText` = "'.$GLOBALS['DATABASE']->escape($config->OverviewNewsText).'"';
		
                $GLOBALS['DATABASE']->query("INSERT INTO ".CONFIG." SET ".implode(', ', $configSQL).";");
                $newUniverse	= $GLOBALS['DATABASE']->GetInsertID();

                Config::reload();

                list($userID, $planetID) = PlayerUtil::createPlayer($newUniverse, $USER['username'], '', $USER['email'], $USER['lang'], 1, 1, 1, NULL, AUTH_ADM);
                $GLOBALS['DATABASE']->query("UPDATE ".USERS." SET password = '".$USER['password']."' WHERE id = ".$userID.";");

                if($universeCount === 1)
                {
				// Hack The Session
                    setcookie(session_name(), session_id(), SESSION_LIFETIME, HTTP_ROOT.'uni'.$USER['universe'].'/', NULL, HTTPS, true);
                    HTTP::redirectTo("uni".$USER['universe']."/admin.php");
                }
            break;
        }
	
        $uniList	= array();
	
        $uniResult	= $GLOBALS['DATABASE']->query("SELECT uni, users_amount, game_disable, energySpeed, halt_speed, resource_multiplier, fleet_speed, game_speed, uni_name, COUNT(DISTINCT  inac.id) as inactive, COUNT(planet.id) as planet
        FROM ".CONFIG." conf
        LEFT JOIN ".USERS." as inac ON uni = inac.universe AND inac.onlinetime < ".(TIMESTAMP - INACTIVE)."
        LEFT JOIN ".PLANETS." as planet ON uni = planet.universe
        GROUP BY conf.uni, inac.universe, planet.universe
        ORDER BY uni ASC;");
	
        while($uniRow = $GLOBALS['DATABASE']->fetch_array($uniResult)) {
            $uniList[$uniRow['uni']]	= $uniRow;
        }
	
        $this->assign(array(
            'uniList'	=> $uniList,
            'SID'		=> session_id(),
        ));
	
        $this->display('page.universe.default.tpl');
	}
}

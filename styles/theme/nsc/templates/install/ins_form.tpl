{include file="ins_header.tpl"}
{include file="ins_nav.tpl"}
<main role="main" class="container">
    <div class="card mb-3">
        <h5 class="card-header">{$LNG.step1_head}</h5>
        <div class="card-body">
            <p class="card-text">{$LNG.step1_text}</p>
            <form action="index.php?mode=install&step=4" method="post"> 
            <input type="hidden" name="post" value="1">
                <div class="mb-3">  
                    <div class="form-group">
                        <label for="host">{$LNG.step1_mysql_server}</label>
                        {if isset($smarty.get.host) && $smarty.get.host}
                            <input type="text" name="host" value="{$smarty.get.host|escape:'htmlall'}" class="form-control" id="host">
                        {else}
                            <input type="text" name="host" value="{$host|escape:'htmlall'}" class="form-control" id="host">
                        {/if}
                    </div>
                    <div class="form-group">
                        <label for="port">{$LNG.step1_mysql_port}</label>
                        {if isset($smarty.get.host) && $smarty.get.host}
                            <input type="text" name="port" value="{$smarty.get.port|escape:'htmlall'}" class="form-control" id="port">
                        {else}
                            <input type="text" name="port" value="3306" class="form-control" id="port">
                        {/if}

                    </div>
                    <div class="form-group">
                        <label for="user">{$LNG.step1_mysql_dbuser}</label>
                        {if isset($smarty.get.user) && $smarty.get.user}
                           <input type="text" name="user" value="{$smarty.get.user|escape:'htmlall'}" class="form-control" id="user">
                        {else}
                            <input type="text" name="user" value="{$user|escape:'htmlall'}" class="form-control" id="user">
                        {/if}

                    </div>
                    <div class="form-group">
                        <label for="password">{$LNG.step1_mysql_dbpass}</label>
                        <input type="password" name="passwort" value="{$user}" class="form-control" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="dbname">{$LNG.step1_mysql_dbname}</label>
                        {if isset($smarty.get.dbname) && $smarty.get.dbname}
                            <input type="text" name="dbname" value="{$smarty.get.dbname|escape:'htmlall'}" class="form-control" id="dbname">
                        {else}
                            <input type="text" name="dbname" value="{$dbname|escape:'htmlall'}" class="form-control" id="dbname">
                        {/if}

                    </div>
                    <div class="form-group">
                        <label for="prefix">{$LNG.step1_mysql_prefix}</label>
                        {if isset($smarty.get.prefix) && $smarty.get.prefix}
                            <input type="text" name="prefix" value="{$smarty.get.prefix|escape:'htmlall'}" class="form-control" id="prefix">
                        {else}
                            <input type="text" name="prefix" value="uni1_" class="form-control" id="prefix">
                        {/if}
                    </div>
                </div>
                <button type="submit" name="next" class="btn btn-primary">{$LNG.continue}</button>
            </form>
        </div>
    </div>
</main>
{include file="ins_footer.tpl"}
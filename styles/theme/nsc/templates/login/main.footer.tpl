<footer>
    <div id="app" class="container">
		<p class="float-right"><a href="#">{$LNG.footer_up}</a></p>
		<p>©2021-{{ new Date().getFullYear() }} {$gameName}, <a href="https://github.com/coolxitech/New-Star">github</a></p>
	</div>
</footer>
<div id="dialog" style="display:none;"></div>
<script>
var LoginConfig = {
    'isMultiUniverse': {$isMultiUniverse|json},
	'unisWildcast': {$unisWildcast|json},
	'referralEnable' : {$referralEnable|json},
	'basePath' : {$basepath|json}
};
</script>
{if $analyticsEnable}
<script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("{$analyticsUID}");
pageTracker._trackPageview();
} catch(err) {}</script>
{/if}
<script src="https://static.sickgal.com/npm/vue/dist/vue.global.prod.js"></script>
<script>
	const { createApp } = Vue;
	const app = createApp({
		setup() {
		}
	})
	app.mount('#app');
</script>
</body>
</html>
	{if !isset($appbar)}
		{$appbar = ['visible' => true,'visible_tabs' => true,'button_select' => true,'button_create' => true,'button_delete' => true,'button_update' => true, 'buttons' => [] ]}
	{/if}

	{if !isset($appbar.visible)}
		{append 'appbar' true index='visible'}
	{/if}
	{if !isset($appbar.visible_tabs)}
		{append 'appbar' true index='visible_tabs'}
	{/if}
	{if !isset($appbar.button_create)}
		{append 'appbar' true index='button_create'}
	{/if}
	{if !isset($appbar.button_update)}
		{append 'appbar' true index='button_update'}
	{/if}
	{if !isset($appbar.button_delete)}
		{append 'appbar' true index='button_delete'}
	{/if}
	{if !isset($appbar.button_select)}
		{append 'appbar' true index='button_select'}
	{/if}

	{if isset($appbar.buttons)}
		{foreach key=btnName item=btnItem  from=$appbar.buttons }
			{if $btnName eq "create"}
				{$appbar.button_create = $btnItem}
			{/if}
			{if $btnName eq "update"}
				{$appbar.button_update = $btnItem}
			{/if}
			{if $btnName eq "delete"}
				{$appbar.button_delete = $btnItem}
			{/if}
			{if $btnName eq "select"}
				{$appbar.button_select = $btnItem}
			{/if}
		{/foreach}
	{/if}

	<div id="ribbon" class="ribbon">
		<div class="menu-mobile" id="menu-mobile">☰</div>
		<span class="ribbon-window-title">Aplicaci&oacute;n Web {if isset($title)} [{$title|default:""}]{/if}</span>
		<a href="{SITE_URL}/Usu/Profile" class="ribbon-profile">
			<img src="{SITE_URL}/layout/assets/images/user.png" alt="Open"  class="ribbon-profile-image" />
			<span class="profile-info">{$_sesion_->get("usunom")} | {$_sesion_->get("cennom")}</span>
		</a>
		{if $appbar.visible eq true}
			{block name=toolbar_container}
			<div class="ribbon-container">

				{include file="app.toolbar.tabs.tpl"}

			</div>
			{/block}
		{/if}
	</div>

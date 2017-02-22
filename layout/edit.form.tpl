{assign var='icon' value=','|explode:"dir,doc,exe"}
{assign var="_fields"     value=$data.fields}
{assign var="_views"      value=array()}
{assign var="_dataRow"    value=$data.dataRow}
{assign var="_primaryKey" value=$data.primaryKey}

{assign var="primaryKey"  value=""}
{foreach key=fieldname item=row  from=$_fields }
  {assign var="type"             value="text"}
  {if isset($row.type)}
    {assign var="type"    value=$row.type}
  {/if}
  {if $type eq 'key'}
    {assign var="primaryKey"  value=$_dataRow[$fieldname]}
  {/if}
{/foreach}

{assign var="THIS_PK"     value=""}
{assign var="view_tbl"    value=$data.TableName}

{if isset($data.views)}
	{assign var="_views"   value=$data.views}
{/if}

{if $issingle eq false}
  <!--
    - Formulario completo
    -->


  {if count($_views) neq 0}
    <div class="row">
      <div class="col-md-4">
  {/if}

    <form role="form" method="post" id="form_{$_controller_}" name="form_{$_controller_}" action="{SITE_URL}/{$_controller_}/save" class="row"  enctype="multipart/form-data" style="padding: 15px;" >
      {include file="edit.form.main.tpl"}
    </form>

  <!--
    - ./Formulario completo
    -->

  {if count($_views) neq 0}
      </div><!-- ./col-md-4 -->
      <div class="col-md-8">

        <script language="JavaScript">
          var dataTables      = [];
          var dataTables_grid = [];
        </script>
        <ul class="nav nav-tabs">
          {assign var="TabCount"   value=0}
          {foreach key=view_key item=view_item  from=$_views }
            {assign var="view_label"   value=$view_key}
            {assign var="view_tbl"     value=$view_item.fk_tbl}
            {assign var="TabCount"   value=$TabCount+1}

            {if isset($view_item.fk_label)}
              {assign var="view_label"   value=$view_item.fk_label}
            {/if}
            <li class="{if $TabCount eq 1}active{/if}"><a href="#tab_{$view_tbl}" data-toggle="tab">{$view_label}</a></li>
          {/foreach}
        </ul>
        <div class="tab-content">
          {assign var="TabCount"   value=0}
          {foreach key=view_key item=view_item  from=$_views }
            {assign var="view_label"   value=$view_key}
            {assign var="view_tbl"     value=$view_item.fk_tbl}
            {assign var="view_ide"     value=$view_item.fk_ide}
            {assign var="view_order"   value=""}
            {assign var="TabCount"     value=$TabCount+1}
            {assign var="WithToolbar"  value=true}

            {if isset($view_item.label)}
              {assign var="view_label"   value=$view_item.fk_label}
            {/if}

            {if isset($view_item.fk_order)}
              {assign var="view_order"   value=$view_item.fk_order}
            {/if}
            <!-- 
               - view_label: {$view_label}
               - view_tbl: {$view_tbl}
               - view_ide: {$view_ide}
               - view_order: {$view_order}
               - primaryKey: {$primaryKey}
               - TabCount: {$TabCount}
               -->

            <div class="tab-pane {if $TabCount eq 1}active{/if}" id="tab_{$view_tbl}">

              {include file="edit.form.data-table.tpl"}

            </div><!-- /.tab-pane -->

          {/foreach}
        </div>
  {/if}


  {if count($_views) neq 0}
      </div><!-- ./col-md-8 -->
    </div><!-- ./row -->
  {/if}


{else}
  <!--
    - Formulario EditInPlace
    -->
	{include file="edit.form.main.tpl"}
  <!--
    - ./Formulario EditInPlace
    -->

{/if}

<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<?= $dashboard->getDashboardPaneHeaderWrapper(t('Data Types'), false, false) ?>
<?= $interface->button(t('Create'), $this->url('/dashboard/data/administration/create')) ?>
<div class="clearfix"></div>
<table class="ccm-results-list">
	<tr class="ccm-results-list-header">
		<th><?= t('Name' ) ?></th>
	</tr>
	<?php if (!$dataTypes) { ?>
		<tr class="ccm-list-record"><td><?= t('No Data Types found') ?></td></tr>
	<?php } else { ?>
		<?php $alt = ''; foreach ($dataTypes as $dataType) { ?>
			<tr class="ccm-list-record<?= $alt ?>">
				<td><a href="<?= $dataType->permissionKeyCategory->getToolsURL('display_list') . h('&dtID=' . $dataType->dtID) ?>"
							 class="btn ccm-button-v2-right"
							 id="data-permissions-dialog-button"
							 data-permissions-dialog-button=""
							 dialog-title="<?= t('Permissions') ?>"
							 dialog-modal="true"
							 dialog-height="500"
							 dialog-width="420"
							 dialog-append-buttons="true"
				><?= t('Permissions') ?></a><?= $dataType->dtName ?><?= $interface->button(t('Edit'), $this->url('/dashboard/data/administration/edit', $dataType->dtID)) ?><?= $interface->button(t('Attributes'), $this->url('/dashboard/data/administration/attributes', $dataType->dtID)) ?></td>
			</tr>
		<?php $alt = $alt ? '' : ' ccm-list-record-alt'; } ?>
	<?php } ?>
</table>

<script>
+function($) {
	$(function() {
		$("[data-permissions-dialog-button]").dialog();
	});
}(jQuery);
</script>
<?= $dashboard->getDashboardPaneFooterWrapper(true) ?>

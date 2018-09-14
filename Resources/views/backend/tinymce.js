






//{block name="backend/base/attribute/form" append}
Ext.define('Shopware.form.field.TinyMCE',{
    extend: 'Shopware.form.field.CodeMirror',
    constructor(config) {
        var me = this;

        if (!Ext.isDefined(config.mode)) {
            config.mode = 'htmlmixed';
        }

        me.callParent(arguments);
    }
});
//{/block}
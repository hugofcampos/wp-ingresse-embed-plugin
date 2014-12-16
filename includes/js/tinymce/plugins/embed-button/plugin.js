(function() {
    tinymce.create('tinymce.plugins.IngresseEmbed', {
        init : function(ed, url) {
            ed.addButton('addevent', {
                title : 'Crie um botão de compra Ingresse',
                cmd : 'addevent',
                image : url + '/button.png'
            });

            ed.addCommand('addevent', function() {
                var id = prompt("Digite o ID do seu Evento"),
                    shortcode;
                if (id !== null) {
                    id = parseInt(id);

                    shortcode = '[ingresse-embed-button id="' + id + '"/]';
                    ed.execCommand('mceInsertContent', 0, shortcode);

                }
            });
        },
    });

    // Register plugin
    tinymce.PluginManager.add( 'ingresseEmbed', tinymce.plugins.IngresseEmbed );
})();
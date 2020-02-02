$('.button').on('click', function(e) {
    e.preventDefault();

    var form = $(this).parent();
    var button = $(this);
    var input = $(this).parent().children('div').children('input');
    var text = input.val();

    if (text == '') {
        input.focus();
    } else {
        input.val('');
        form.hide();

        $.ajax({
            url: 'https://www.uplexis.com.br/blog/?s='+text+'',
            type: 'GET',

            //retorno da chamada GET
            success: function(data) {
                var empty = $(data).find('.mt-5.mb-5 p').html();

                if (empty == '&nbsp;') {
                    alert('Nenhum artigo encontrado.');
                    form.show();
                } else {

                    var firstTitle = $(data).find('.col-md-6.title').html().trim();
                    var firstLink = $(data).find('.col-md-6.d-flex a').attr('href');

                //TITLES
                // armazena o primeiro titulo da busca dentro do objeto JS
                    var titles = {1: firstTitle}

                    var key = 2;
                //busca elementos que possuem apenas a div .cold-md-6 (seletor em css)
                    $('.col-md-6:not(".title, .d-flex") .title', data).each(function() {
                        var title = $(this).html().trim();
                //insere o valor dentro do objeto titles
                        titles[key] = title;
                        key++;

                    });

                //LINKS
                    var links = {1: firstLink}

                    var key = 2;

                    $('.col-md-6:not(".title, .d-flex") .wrap-button a', data).each(function() {
                        var link = $(this).attr('href');

                        links[key] = link;
                        key++;

                    });

                    //contar numero de chaves do objeto
                    Object.size = function(obj) {
                        var size = 0, key;
                        for (key in obj) {
                            if (obj.hasOwnProperty(key)) size++;
                        }
                        return size;
                    };

                    var size = Object.size(titles);

                    //criando o objeto e juntando os titulos aos links**
                    var artigos = {}

                    for (i = 1; i <= size; i++) {
                        artigos[i] = [titles[i], links[i]];
                    }

                    //funçao do javascript para converter o objeto para json
                    data = JSON.stringify(artigos);

                    //funçao ajax para requisiçao dos dados
                    $.ajax({
                        url: '../functions/php/func_insert_data.php',
                        type:'POST',
                        data: {
                            data: data
                        },
                        success: function(result) {
                            alert(result);
                            form.show();
                            location.reload();
                        }
                    });
                }


            }
        });
    }


});

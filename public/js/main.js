new Vue({
    el: 'body',

    data: {
        title: 'Nouvel article',
        submit: 'Valider',
        annuler: false,
        article: {
            id: 0,
            title: ''
        },
        category: 1,
        action: ''
    },

    methods: {
        loadArticle: function(id) {
            this.title = 'Modifier article';
            this.submit = 'Modifier';
            this.action = '/articles';
            this.annuler = true;

            $.getJSON('/api/article/' + id, function(article) {
                this.article = article;
                this.category = article.category_id;
                $('#summernote').summernote('code', article.content);
            }.bind(this));
        },

        onSubmit: function(e) {
            e.preventDefault();
            $('#content').val($('#summernote').summernote('code'));
            $('form').unbind('submit').submit();
        },

        delete: function(id) {
            swal({title: "Voulez-vous vraiment supprimer cet article?",
                text: "Cet action est irréversible!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Oui, supprimer!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.ajax({
                    type: 'POST',
                    url: "/articles/" + id,
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#tr'+id).hide();
                        swal({
                            title: "",
                            text: "Article supprimé!",
                            showConfirmButton: true,
                            type: "success"
                        })
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
        }
    }
});


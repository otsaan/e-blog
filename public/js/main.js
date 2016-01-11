new Vue({
    el: 'body',

    data: {
        title: 'Nouvel article',
        submit: 'Valider',
        article: {
            id: 0,
            title: ''
        },
        category: '',
        action: ''
    },

    methods: {
        loadArticle: function(id) {
            this.title = 'Modifier article';
            this.submit = 'Modifier';
            this.action = '/articles';

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
        }
    }
});
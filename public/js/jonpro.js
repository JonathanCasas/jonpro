var jonpro = function (element) {
    this.companies = function (route) {
        this.select2(route);
    };
    this.users = function (route, placeholder) {
        this.select2(route, placeholder);
    };
    this.select2 = function (route, placeholder) {
        $(element).select2({
            ajax: {
                url: route,
                dataType: 'json',
                data: function (params) {
                    var query = {
                        term: params.term,
                        page: params.page || 1
                    }
                    return query;
                },
                delay: 250 // wait 250 milliseconds before triggering the request

            },
            delay: 250,
            lang: 'es',
            allowClear: true,
            placeholder: placeholder,
            minimumInputLength: 0,
            width: '100%'
        });
    };
};



/** placeholder: 'Search for a repository'
 * @param {String} element 
 * @returns {jonpro} 
 */
var $jp = function (element) {
    return new jonpro(element);
};
<template>
    <div id="app"></div>
</template>

<script>


export default {
    name: 'app',
    components: {
    },
    data() {
        return {
            searchRes: []
        }
    },
    mounted() {
        let that = this;
        let timer = null;

        jQuery('.entry.login-link').click(function (e) {
            that.login(e);
        })
        jQuery('.modal-form.login input').on('input', function() {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.input-block').find('.error-text').removeClass('active')
        });
        jQuery('[name="address"]').on('input', function (e) {
            if (e.target.value.length < 3) {
                return;
            }
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout( () => {
                timer = null;
                axios.post('/search/tooltip', { input: e.target.value})
                .then( (resp) => {
                    that.searchRes = resp.data;
                    if (that.searchRes.length === 0) {
                        jQuery('.result-search ul').html('<li>' + that.$t('No results found') + '</li>');
                        jQuery('.result-search').addClass('active');
                        return;
                    }
                    let str = [];
                    for (let i in that.searchRes) {
                        let line = `<li type="${that.searchRes[i]['type']}" domain="${that.searchRes[i]['domain']}">${that.searchRes[i]['text']}</li>`;
                        str.push(line)
                    }
                    jQuery('.result-search ul').html(str);
                    jQuery('.result-search').addClass('active');
                })
            }, 1000)
        })
        jQuery('.result-search').on('click', 'ul li', function(e) {
            let type = jQuery(this).attr('type');
            if (!type) {
                jQuery('.result-search').removeClass('active');
                return;
            }
            let domain = jQuery(this).attr('domain');
            let subdomain = domain.split('//')[1].split('.')[0];
            let current = document.location.hostname.split('.')[0];
            if (current !== subdomain) {
                console.log(domain + '?' + jQuery('form.find-subdomain-redirect').serialize());
                //document.location = domain + '?' + jQuery('form.find-subdomain-redirect').serialize();
            }

        })
        jQuery('body').on('click', function(e) {
            if (jQuery(this).closest('.result-search').length === 0) {
                jQuery('.result-search').removeClass('active');
            }

        })

    },
    methods: {
        login(e) {
            console.log(this.$auth);
            e.preventDefault();
            let res = true;
            jQuery('.modal-form.login input').each(function() {
                var value = jQuery(this).val();
                if (value === '') {
                    jQuery(this).addClass('error');
                    jQuery(this).closest('.input-block').find('.error-text').addClass('active')
                    res = false;
                }
            })

            if (res === false) {
                return;
            }
            this.$auth.login({
                data: {
                    email: jQuery('#mail-phone').val(),
                    password: jQuery('#password').val()
                },
                redirect: '/dashboard',
                staySignedIn: true,
                fetchUser: true
            })
                .then((resp) => {
                    document.location = '/dashboard';
                });
        },
    }
}
</script>

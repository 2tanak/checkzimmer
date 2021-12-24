<template>
    <div id="app"></div>
</template>

<script>
import axios from 'axios';

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
        jQuery('[name="address"]').on('focus', function() {
            let item = jQuery('.result-search ul li:first-child');
            if (jQuery(item).attr('type')) {
                jQuery('.result-search').addClass('active');
            }
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
                // ToDo: geocode address in not postcode or city
                // ToDo: check distances for city and postcode in case ciy does not have a domain
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
                        let value = that.searchRes[i]['type'] === 'code' ? that.searchRes[i]['code'] : '';
                        let line = `<li type="${that.searchRes[i]['type']}" domain="${that.searchRes[i]['domain']}" value="${value}">${that.searchRes[i]['text']}</li>`;
                        str.push(line)
                    }
                    jQuery('.result-search ul').html(str);
                    jQuery('.result-search').addClass('active');
                })
            }, 1000)
        })
        jQuery('[name="address"]').keydown((e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                e.stopPropagation();
            }
        })
        jQuery('.result-search').on('click', 'ul li', function(e) {
            let type = jQuery(e.target).attr('type');
            if (!type) {
                jQuery('.result-search').removeClass('active');
                return;
            }
            let domain = jQuery(e.target).attr('domain');
            let value = jQuery(e.target).attr('value');
            jQuery('form input[name="address"]').val(value);
            jQuery('form input[name="address"]').attr('type', type);
            jQuery('form input[name="address"]').attr('domain', domain);
            let subdomain = domain.split('//')[1].split('.')[0];
            let current = document.location.hostname.split('.')[0];
            if (current !== subdomain) {
                document.location = domain + '/?' + jQuery('form.find-subdomain-redirect').serialize().replace(/_token=.*?&/, '');
            }

        })
        jQuery('body').on('click', function(e) {
            if (jQuery(e.target).closest('.result-search').length === 0 && jQuery(e.target).closest('form').length === 0) {
                jQuery('.result-search').removeClass('active');
            }

        })
        jQuery('.find-housing').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            let type = jQuery('form input[name="address"]').attr('type');
            let domain = jQuery('form input[name="address"]').attr('domain');

            if (!domain) {
                document.location = '/property-request';
                //jQuery('.result-search ul').html('<li>' + that.$t('Wrong query: city is not found. Try city name or a postcode') + '</li>');
                //jQuery('.result-search').addClass('active');
                return false;
            }
            document.location = domain + '/?' + jQuery('form.find-subdomain-redirect').serialize().replace(/_token=.*?&/, '');
        })
    },
    methods: {
        login(e) {
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
				 if(resp.data.error){
				   $('.error-login').css({'display':'block'});
				}
                if(resp.data.data.role == 'holder'){
					document.location = '/personal';
					return false;
				}
				if(resp.data.data.role == 'admin'){
				    document.location = '/dashboard';
					return false;
				}
                });
        },
    }
}
</script>

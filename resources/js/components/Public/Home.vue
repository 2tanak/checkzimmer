<template>
    <div id="app"></div>
</template>

<script>


export default {
    name: 'app',
    components: {
    },

    mounted() {
        let that = this;

        jQuery('.entry.login-link').click(function(e) {
            that.login(e);
        })
        jQuery('.modal-form.login input').on('input', function() {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.input-block').find('.error-text').removeClass('active')
        });

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

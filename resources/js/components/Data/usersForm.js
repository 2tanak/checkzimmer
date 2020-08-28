export default {
    id: {
        type: 'hidden'
    },
    name: {
        label: 'Name',
        placeholder: 'Please enter user name',
        type: 'text',
    },
    email: {
        label: 'E-mail',
        placeholder: 'Please enter user email',
        type: 'email',
    },
    role: {
        label: 'Role',
        placeholder: 'Please enter user role',
        type: 'select',
        options: { client: 'Съемщик', admin: 'Admin', holder: 'Владелец' }
    },
    divider: {
        type: 'divider'
    },
    password: {
        label: 'Password',
            placeholder: 'Please type your password',
            type: 'password',
    },
    password_confirmation: {
        label: 'Password approve',
        placeholder: 'Please confirm your password',
        type: 'password',
    },
}

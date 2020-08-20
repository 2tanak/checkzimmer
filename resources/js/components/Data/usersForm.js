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
        options: { user: 'User', admin: 'Admin' }
    },
    divider: {
        type: 'divider'
    },
    password: {
        label: 'Password',
            placeholder: 'Please type your password',
            type: 'password',
    },
    password_approve: {
        label: 'Password approve',
            placeholder: 'Please confirm your password',
            type: 'password',
    },
}

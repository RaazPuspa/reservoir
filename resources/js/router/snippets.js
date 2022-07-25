import List from '../components/snippets/List.vue'
import Create from '../components/snippets/Create.vue'
import Edit from '../components/snippets/Edit.vue'

export default [
    {
        path: '',
        name: 'snippets',
        component: List,
    },
    {
        path: 'create',
        name: 'snippets.create',
        component: Create,
    },
    {
        path: ':uuid/edit',
        name: 'snippets.edit',
        component: Edit,
        props: true,
    },
];

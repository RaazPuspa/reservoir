import List from '../components/links/List.vue'
import Create from '../components/links/Create.vue'
import Edit from '../components/links/Edit.vue'

export default [
    {
        path: '',
        name: 'links',
        component: List,
    },
    {
        path: 'create',
        name: 'links.create',
        component: Create,
    },
    {
        path: ':uuid/edit',
        name: 'links.edit',
        component: Edit,
        props: true,
    },
];

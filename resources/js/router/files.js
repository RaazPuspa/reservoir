import List from '../components/files/List.vue'
import Create from '../components/files/Create.vue'
import Edit from '../components/files/Edit.vue'

export default [
    {
        path: '',
        name: 'files',
        component: List,
    },
    {
        path: 'create',
        name: 'files.create',
        component: Create,
    },
    {
        path: ':uuid/edit',
        name: 'files.edit',
        component: Edit,
        props: true,
    },
];

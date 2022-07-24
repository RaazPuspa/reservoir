import {createRouter, createWebHistory} from 'vue-router';

import files from './files';
import links from './links';
import snippets from './snippets';

import Void from '../components/Void.vue';

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            children: [
                {
                    path: '',
                    component: Void,
                },
                {
                    path: 'files',
                    children: files,
                },
                {
                    path: 'links',
                    children: links,
                },
                {
                    path: 'snippets',
                    children: snippets,
                },
            ],
        },
    ],
});

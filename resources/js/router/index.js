import { createRouter, createWebHistory } from "vue-router"

//admin
import homeAdminIndex from '../components/admin/home/index.vue'
import adminAboutIndex from '../components/admin/about/index.vue'
import adminServiceIndex from '../components/admin/services/index.vue' 
import adminSkillIndex from '../components/admin/skill/index.vue'
import adminEducationIndex from '../components/admin/education/index.vue'
import adminExperienceIndex from '../components/admin/experience/index.vue'
import adminProjectIndex from '../components/admin/project/index.vue'
import adminProjectNew from '../components/admin/project/new.vue'
import adminProjectEdit from '../components/admin/project/edit.vue'

import adminTestimonialIndex from '../components/admin/testimonial/index.vue'
import adminTestimonialNew from '../components/admin/testimonial/new.vue'
import adminTestimonialEdit  from '../components/admin/testimonial/edit.vue'
import adminMessageIndex from '../components/admin/message/index.vue'
import adminUserIndex from '../components/admin/user/index.vue'
import adminProfile from '../components/admin/user/profile.vue'
 //pages

import homePageIndex from '../components/pages/home/index.vue'
//login
import login from '../components/auth/login.vue'

import notFound from '../components/notFound.vue'


const routes=[
    //admin
    {
        path: '/admin/home',
        component:homeAdminIndex
},

{
    path: '/admin/about',
    name:'adminAbout',
    component:adminAboutIndex
},

{
    path: '/admin/service',
    name:'adminService',
    component:adminServiceIndex
},
{
    path:'/admin/skill',
    name:'adminSkill',
    component: adminSkillIndex
},
{
    path:'/admin/education',
    name:'adminEducation',
    component:adminEducationIndex
},
{
    path:'/admin/experience',
    name:'adminExperience',
    component:adminExperienceIndex
},

{
    path:'/admin/project',
    name:'adminProject',
    component:adminProjectIndex
},
{
    path:'/admin/project/new',
    name:'adminProjectNew',
    component:adminProjectNew
},
{
    path:'/admin/project/edit/:id',
    name:'adminProjectEdit',
    component:adminProjectEdit,
    props:true
},

{
    path:'/admin/testimonial',
    name:'adminTestimonialIndex',
    component:adminTestimonialIndex
},

{
    path:'/admin/testimonial/new',
    name:'adminTestimonialNew',
    component:adminTestimonialNew
},

{
    path:'/admin/testimonial/edit/:id',
    name:'adminTestimonialEdit',
    component:adminTestimonialEdit,
    props:true
},

{
    path:'/admin/message',
    name:'adminMessageIndex',
    component:adminMessageIndex
},

{
    path:'/admin/user',
    name:'adminUserIndex',
    component:adminUserIndex
},
{
    path:'/admin/profile',
    name:'adminProfile',
    component:adminProfile
},
//pages

{
    path:'/',
    component:homePageIndex
},

//Login
{
path:'/login',
component:login
},
//notFound
{
    path:'/:pathMatch(.*)*',
    component:notFound
}

]

const router =createRouter({
    history: createWebHistory(),
    routes,
})

export default router
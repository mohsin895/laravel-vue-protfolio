<script setup>

import { useRouter } from 'vue-router';
import Base from '../layouts/base.vue';
const router =useRouter()

const logout =()=>{
    localStorage.removeItem('token');
    router.push('/')
}
</script>

<template>
    <Base />
        
    <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
           
            </div>
        </main>
        <!--==================== FOOTER ====================-->
        <footer class="footer">
         
        </footer>


</template>
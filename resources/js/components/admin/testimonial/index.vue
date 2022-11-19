<script setup>
    import Base from '../layouts/base.vue'
    import { onMounted ,ref} from 'vue';
     import {useRouter} from 'vue-router';

     const router = useRouter()

let testimonials= ref([])

    onMounted(async()=>{
        getTestimonial()
    })

const getTestimonial =async()=>{
    let response = await axios.get('/api/get_all_testimonial')
    testimonials.value = response.data.testimonials
}

const ourImage=(img)=>{
    return '/img/upload/' + img
}

const newTestimonial =()=>{
    router.push('/admin/testimonial/new')
}

const EditTestimonial =(id)=>{
    router.push('/admin/testimonial/edit/' +id)
}


const deletetestimonial =(id)=>{
    Swal.fire({
        title:'Are you sure ?',
        text:"You can't go back",
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText:'Yes, delete it !'
    })
    .then((result) =>{
        if(result.value){
            axios.get('/api/delete_testimonial/' + id)
            .then(()=>{
                Swal.fire(
'Delete',
'Services delete successfully',
'success'
                )
                getTestimonial()
            })
        }
    })
}

</script>

<template>
<Base />
    <main class="main">
        <div class="main__sideNav"></div>

        <div class="main__content">
            <section class="testimonials section" id="testimonials">
                <div class="testimonials_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Testimonials </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal" @click="newTestimonial">
                                New Testimonial
                            </div>
                        </div> 
                    </div>

                    <div class="table">

                        <div class="table_filter">
                            <span class="table_filter-Btn ">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <div>
                                <ul class="table_filter-list">
                                    <li>
                                        <p class="table_filter-link table_filter-link--active">
                                            All
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
            
                        <div class="table_search">
                            <div class="table_search-wrapper">
                                <select class="table_search-select" name="" id="">
                                    <option value="">Filter</option>
                                </select>
                            </div>
                            <div class="relative">
                                <i class="table_search-input--icon fas fa-search "></i>
                                <input class="table_search--input" type="text" placeholder="Search Testimonial">
                            </div>
                        </div>
            
                        <div class="testimonial_table-heading">
                            <p>Photo</p> 
                            <p>name</p>
                            <p>Function</p>
                            <p>Testimony</p>
                            <p>Rating</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="testimonial_table-items" v-for="item in testimonials" :key="item.id" v-if="testimonials.length > 0">
                            <p>
                                <img :src="ourImage(item.photo)" class="testimonial_img-list">
                            </p>
                            <p>{{item.name}}</p>
                            <p>{{item.function}}</p>
                            <p>{{item.testimony}}</p>
                            <p>{{item.rating}}/5</p>
                            <div>
                                <button class="btn-icon success" @click="EditTestimonial(item.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" @click="deletetestimonial(item.id)">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </section>
        </div>
    </main>


</template>

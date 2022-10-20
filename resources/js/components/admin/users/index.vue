<script setup>

    import Base from '../layouts/base.vue'
    import {onMounted, ref } from "vue"
    import axios from 'axios';


    let users = ref([])

    onMounted ( async () => {
        getUsers()
    })


    const showModal = ref(false)
    const hideModal = ref(true)

    const getUsers = async () =>{
        let response = await axios.get("/api/get_all_user")
        // console.log('response',response);
        users.value = response.data.users;
    }

    const ourImage = (img) =>{
        return "/img/upload/" + img
    }

    const openModal = ()=>{
        showModal.value != showModal.value
    }

</script>
<template>
    <Base/>
    <!--==================== MAIN ====================-->
    <main class="main">

            <div class="main__sideNav"></div>
            <!-- Main Content -->
            <div class="main__content">
               <!--==================== USERS ====================-->
            <section class="users section" id="users">
                <div class="users_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Users </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn" @click="openModal()">
                                New User
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
                                <input class="table_search--input" type="text" placeholder="Search User">
                            </div>
                        </div>

                        <div class="user_table-heading">
                            <p>Photo</p>
                            <p>Name</p>
                            <p>Role</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="user_table-items" v-for="item in users" :key="item.id" >
                            <p>
                                <img :src="ourImage(item.photo)" alt="" class="user_img-list">
                            </p>
                            <p>{{item.name}}</p>
                            <p>{{item.type}}</p>
                            <div>
                                <button class="btn-icon success">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

                <!-------------- USER MODAL --------------->
            <div class="modal main__modal " :class="{show: showModal}" >
                <div class="modal__content">
                    <span class="modal__close btn__close--modal" >×</span>
                    <h3 class="modal__title">Add User</h3>
                    <hr class="modal_line"><br>
                    <div>
                        <p>Name</p>
                        <input type="text" class="input" />

                        <p>Email</p>
                        <input type="text" class="input" />

                        <p>Bio</p>
                        <textarea cols="20" rows="3" class="textarea"></textarea>

                        <p>Type</p>
                        <select class="inputSelect" name="" id="">
                            <option disabled>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">Standard User</option>
                        </select>

                        <p>Password</p>
                        <input  type="password" id="password" class="input">
                    </div>
                    <br><hr class="modal_line">
                    <div class="model__footer">
                        <button class="btn mr-2 btn__close--modal" @click="closeModal()">
                            Cancel
                        </button>
                        <button class="btn btn-secondary btn__close--modal ">Save</button>
                    </div>
                </div>
            </div>
            </section>
            </div>
    </main>
</template>

<?php

/* @var $this yii\web\View */

$this->title = 'Translators';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div id="app">
    <h1>Translators</h1>
    <button @click="applyFilter('')">Show All</button>
    <button @click="applyFilter('weekdays')">Weekdays Only</button>
    <button @click="applyFilter('weekends')">Weekends Only</button>
    <ul>
        <li v-for="translator in translators" :key="translator.id">
            {{ translator.name }} - Available Weekdays: {{ translator.available_weekdays ? 'Yes' : 'No' }} - Available
            Weekends: {{ translator.available_weekends ? 'Yes' : 'No' }}
        </li>
    </ul>
    <button @click="changePage(currentPage - 1)" :disabled="currentPage <= 1">Previous</button>
    <button @click="changePage(currentPage + 1)" :disabled="currentPage >= pageCount">Next</button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const {createApp} = Vue;

        createApp({
            data() {
                return {
                    translators: [],
                    filter: '',
                    currentPage: 1,
                    pageCount: 1,
                    errors[],
                };
            },
            methods: {
                fetchTranslators() {
                    const params = new URLSearchParams({
                        filter: this.filter,
                        page: this.currentPage
                    }).toString();

                    fetch(`/translator/list?${params}`)
                        .then(response => response.json())
                        .then(data => {
                            this.translators = data.models;
                            this.pageCount = data.pagination.pageCount;
                            this.currentPage = data.pagination.currentPage;
                        });
                },
                applyFilter(filter) {
                    this.filter = filter;
                    this.currentPage = 1;
                    this.fetchTranslators();
                },
                changePage(page) {
                    if (page > 0 && page <= this.pageCount) {
                        this.currentPage = page;
                        this.fetchTranslators();
                    }
                }
            },
            mounted() {
                this.fetchTranslators();
            }
        }).mount('#app');
    });
</script>

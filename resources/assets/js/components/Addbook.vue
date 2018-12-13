<template>
    <div class="container">
        <form method="post" action="/books">
        <div  data-ride="carousel" data-interval="false">
            <q-stepper ref="stepper">
                 <q-step default title="Krok 1:" subtitle="Zaczynamy!">
                    <h4>Step 1</h4>

                    <div class="form-group">
                        <label for="Title">Title</label>

                        <p>A good title catches the eye. Think carefully, content of your book can be readed by someone, but title will be readed by everyone... You have <span class="count2" v-bind:class="{green: green, red: red}">{{ count2 }}</span> signs for it.</p><br />
                        <q-input @keyup="titleCount" v-on:change="checkStep1" v-model="title" float-label="title" id="title" name="title" class="title center" maxlength="100"/>

                        <span id="helpblock" class="glyphicon" aria-hidden="true" font-size="12"></span>

                    </div>
                    <div class="form-group">
                        <input type="hidden" v-model="author_id" name="author_id" value="WSTAW TU ID AUTORA!!!">
                        <!-- <input type="hidden" name="content" value="Add the content of your book"> -->
                        <input type="hidden" v-model="readed" name="readed" value="0">
                        <input type="hidden" v-model="published" name="published" value="0">
                        <label for="description">Description</label>
                        <p>Think twice. This description can bring you more readers... or take them away. Max: <span class="count1" v-bind:class="{green: green, red: red}">{{ count1 }}</span></p><br />
                        <q-input type="textarea" class="description" @keyup="descriptionCount" v-on:change="checkStep1" v-model="description" float-label="description" rows="10" maxlength="1000"/>

                    </div>
                    <q-stepper-navigation>
                        <q-btn color="secondary" :disable="step1" @click="$refs.stepper.next()" label="Continue" />
                    </q-stepper-navigation>
                </q-step>
                <q-step title="Krok 2:">
                    <h2>Step 2</h2>
                    <p>Choose categories, which will describe your book: <span class="count3" v-bind:class="{green: green, red: red}">{{ count3 }}</span></p>
                    <div class="form-group">
                        <table class="categories center" align="center">
                        <tr class="center">
                            <td><q-checkbox v-model="comedy" class="category" label="Comedy" @click="categoryChecker" true-value="1" false-value="0"/></td>

                            <td><q-checkbox v-model="fantasy" class="category" label="Fantasy" @click="categoryChecker" true-value="1" false-value="0"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="for_kids" class="category" label="For kids" @click="categoryChecker" true-value="1" false-value="0"/></td>

                            <td><q-checkbox v-model="history" class="category" label="History" @click="categoryChecker" true-value="1" false-value="0"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="moral" class="category" label="Moral" @click="categoryChecker" true-value="1" false-value="0"/></td>
                            <td><q-checkbox v-model="philosophy" class="category" label="Philosophy" @click="categoryChecker" true-value="1" false-value="0"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="religious" class="category" label="Religious" @click="categoryChecker" true-value="1" false-value="0"/></td>
                            <td><q-checkbox v-model="report" class="category" label="Report" @click="categoryChecker" true-value="1" false-value="0"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="romance" class="category" label="Romance" @click="categoryChecker" true-value="1" false-value="0"/></td>
                            <td><q-checkbox v-model="thriller" class="category" label="Thriller" @click="categoryChecker" true-value="1" false-value="0"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="youth" class="category" label="Youth" @click="categoryChecker" true-value="1" false-value="0"/></td>
                            <td></td>
                        </tr>
                        </table>
                    </div>
                    <q-stepper-navigation>
                        <q-btn color="secondary" :disable="step2" @click="$refs.stepper.next()" label="Next" />
                        <q-btn color="secondary" flat @click="$refs.stepper.previous()" label="Back" />
                    </q-stepper-navigation>
                </q-step>
                <q-step title="Krok 3:">
                    <h2>Step 3</h2>
                    <p>Yup, that's all. Add your book and let Your imagination run free.</p>
                    <button type="submit" class="btn btn-primary">Add your book</button>

                </q-step>

            </q-stepper>
        </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'app',

        data() {
            return {
                title: '',
                author_id: '',
                readed: 0,
                published: 0,
                description: '',
                comedy: '0',
                for_kids: '0',
                fantasy: '0',
                history: '0',
                moral: '0',
                philosophy: '0',
                religious: '0',
                report: '0',
                romance: '0',
                thriller: '0',
                youth: '0',
                errors: {},
                count1: 1000,
                count2: 100,
                count3: 3,
                green: true,
                red: false,
                step1: true,
                step2: true
            }
        },

        methods: {
            categoryChecker(){
                var list = [];
                array.forEach(element => {

                });
            },
            checkStep1(){
                if((this.title.length==0) || (this.description.length == 0)){
                    return this.step1 = true;
                } else {
                    return this.step1 = false;
                }

            },
            descriptionCount(){
                /* sprawdzenie ilości wpisanych znaków w opisie */
                this.checkStep1();
                if (this.description.length < 1000) {
                    this.green = true;
                    this.red = false;
                    return this.count1 = 1000 - this.description.length;
                }
                if (this.description.length == 1000) {
                    this.green = false;
                    this.red = true;
                    return this.count1 = 1000 - this.description.length;
                }
            },
            titleCount(){
                /* sprawdzenie ilości wpisanych znaków w opisie */
                this.checkStep1();
                if (this.title.length < 100) {
                    this.green = true;
                    this.red = false;
                    return this.count2 = 100 - this.title.length;
                }
                if (this.title.length == 100) {
                    this.green = false;
                    this.red = true;
                    return this.count2 = 100 - this.title.length;
                }
            },

        }
    }
</script>

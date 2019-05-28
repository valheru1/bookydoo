<template>
    <div class="container">
        <div id="books">
            <div class="white">
                <h4>Edit your book</h4>
                <form method="post" action="/books" @submit.prevent="onSubmit">

                    <!-- {{ method_field('PATCH') }} -->
                    <div class="form-group">
                        <p><label for="Title">Here You can edit your title. You have <span class="count2" v-bind:class="{green: titlecol_green, red: titlecol_red}">{{ count2 }}</span> signs.</label>
                            <q-input @keyup="titleCount" v-on:change="checkStep1" id="title" name="title" class="title center" maxlength="100" v-model="title"/>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="author_id" v-model="author_id">
                        <!-- <input type="hidden" name="content" value="Add the content of your book"> -->
                        <p><label for="published">Publish</label> <input type="checkbox" name="published" value="0"></p>
                        <br/>
                        <label for="description">There you can edit your description, of course if you want. Max: <span class="count1" v-bind:class="{green: description_green, red: description_red}">{{ count1 }}</span></label>

                        <q-field>
                            <q-input type="textarea" rows="1" class="description" @keyup="descriptionCount" v-on:change="checkStep1" v-model="description"/>
                            </q-field>
                    </div>
                    <p>Choose categories, which will describe your book: <span class="count3" v-bind:class="{green: cathegory_green, red: cathegory_red}">{{ count3 }}</span></p>
                    <div class="form-group">
                        <table class="categories center" align="center">
                        <tr class="center">
                            <td><q-checkbox v-model="comedy" class="category" label="Comedy" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.comedy=='0'"/></td>

                            <td><q-checkbox v-model="fantasy" class="category" label="Fantasy" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.fantasy=='0'"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="for_kids" class="category" label="For kids" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.for_kids=='0'"/></td>

                            <td><q-checkbox v-model="history" class="category" label="History" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.history=='0'"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="moral" class="category" label="Moral" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.moral=='0'"/></td>
                            <td><q-checkbox v-model="philosophy" class="category" label="Philosophy" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.philosophy=='0'"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="religious" class="category" label="Religious" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.religious=='0'"/></td>
                            <td><q-checkbox v-model="report" class="category" label="Report" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.report=='0'"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="romance" class="category" label="Romance" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.romance=='0'"/></td>
                            <td><q-checkbox v-model="thriller" class="category" label="Thriller" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.thriller=='0'"/></td>
                        </tr>
                        <tr>
                            <td><q-checkbox v-model="youth" class="category" label="Youth" @input="categoryChecker" true-value="1" false-value="0" :disable="this.count3==0 && this.youth=='0'"/></td>
                            <td></td>
                        </tr>
                        </table>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'app',
        props:  ['author',
                'book_id',
                'book_title',
                'book_description',
                'book_comedy',
                'book_fantasy',
                'book_for_kids',
                'book_history',
                'book_moral',
                'book_philosophy',
                'book_religious',
                'book_report',
                'book_romance',
                'book_thriller',
                'book_youth',
                'title_green',
                'title_red',
                'desc_green',
                'desc_red',
                'cathegory',
                'cat_green',
                'cat_red'
                ],
        data() {
            return {
                title: this.book_title,
                id: this.book_id,
                author_id: this.author,
                readed: 0,
                published: 0,
                description: this.book_description,
                comedy: this.book_comedy,
                for_kids: this.book_for_kids,
                fantasy: this.book_fantasy,
                history: this.book_history,
                moral: this.book_moral,
                philosophy: this.book_philosophy,
                religious: this.book_religious,
                report: this.book_report,
                romance: this.book_romance,
                thriller: this.book_thriller,
                youth: this.book_youth,
                errors: {},
                count1: (1000-this.book_description.length),
                count2: (100-this.book_title.length),
                count3: (3-this.cathegory),
                titlecol_red: this.title_red,
                titlecol_green: this.title_green,
                description_red: this.desc_red,
                description_green: this.desc_green,
                cathegory_green: this.cat_green,
                cathegory_red: this.cat_red,
                counter: 0,
                disable: false,
                message: ''
            }
        },

        methods: {
            /* changing status of button from the 1 Step to 2 Step */
            checkStep1(){
                if((this.title.length<2) || (this.description.length < 50)){
                    return this.step1 = true;
                } else {
                    return this.step1 = false;
                }
            },
            /* changing status of button from the 2 Step to 3 Step */
            checkStep2(){
                if(this.count3 >= 3 ){
                    return this.step2 = true;
                } else {
                    return this.step2 = false;
                }
            },
            /* counting signs in the description field*/
            descriptionCount(){
                this.checkStep1();
                if (this.description.length < 50 || this.description.length == 1000) {
                    this.description_green = false;
                    this.description_red = true;
                    return this.count1 = 1000 - this.description.length;
                }
                if (this.description.length >= 50 && this.description.length < 1000) {
                    this.description_green = true;
                    this.description_red = false;
                    return this.count1 = 1000 - this.description.length;
                }
            },
            /* counting signs in the title field*/
            titleCount(){
                this.checkStep1();
                if (this.title.length < 100 && this.title.length >= 2) {
                    this.titlecol_green = true;
                    this.titlecol_red = false;
                    return this.count2 = 100 - this.title.length;
                }
                if (this.title.length == 100 || this.title.length < 2) {
                    this.titlecol_green = false;
                    this.titlecol_red = true;
                    return this.count2 = 100 - this.title.length;
                }
            },
            /* checking what category is selected and let select just 3 of them */
            categoryChecker(){

                if(this.count3 >= 0){
                    this.counter = 0;

                    if(this.comedy == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.for_kids == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.fantasy == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.history == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.moral == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.philosophy == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.religious == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.report == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.romance == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.thriller == '1'){
                        this.counter = this.counter + 1;
                    }
                    if(this.youth == '1'){
                        this.counter = this.counter + 1;
                    }

                    if(this.counter >= 3 ){
                        this.cathegory_red = true;
                        this.cathegory_green = false;
                    } else {
                        this.cathegory_red = false;
                        this.cathegory_green = true;
                    }
                    this.count3 = 3-this.counter;

                return this.count3;
                }
            },
            onSubmit() {
                axios.patch('/books/'+this.book_id, this.$data)
                     .then(response => window.location = "/books")
                     .catch(errors => this.$q.notify({
                            icon: 'warning',
                            message: this.message,
                            timeout: 0
                            }))
                }

        }
    }
</script>

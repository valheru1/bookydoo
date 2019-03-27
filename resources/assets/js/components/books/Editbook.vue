<template>
    <div class="container">
        <div id="books">
            <div class="white">
                <h4>Edit your book</h4>
                <form method="post" action="/books/{id}"  >

                    <!-- {{ method_field('PATCH') }} -->
                    <div class="form-group">
                        <p><label for="Title">Here You can edit your title</label>
                            <q-input id="title" name="title" class="title center" maxlength="100" v-model="title"/>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="author_id" v-model="author_id">
                        <!-- <input type="hidden" name="content" value="Add the content of your book"> -->
                        <p><label for="published">Publish</label> <input type="checkbox" name="published" value="0"></p>
                        <br />
                        <label for="description">There you can edit your description, of course if you want.</label>
                        <span class="count1">1000</span>
                        <q-field>
                            <q-input type="textarea" rows="1" class="description" @keyup="descriptionCount" v-on:change="checkStep1" v-model="description"/>
                            </q-field>
                    </div>
                    <p>Choose categories, which will describe your book: <span class="count">3</span></p>
                    <div class="form-group">
                        <table class="text-center categories" align="center">
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="comedy"></td>
                                <td class="category">comedy</td>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="fantasy"></td>
                                <td class="category">fantasy</td>
                            </tr>
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="for_kids"></td>
                                <td class="category">for kids</td>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="history"></td>
                                <td class="category">history</td>
                            </tr>
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="moral"></td>
                                <td class="category">moral</td>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="philosophy"></td>
                                <td class="category">philosophy</td>
                            </tr>
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="religious"></td>
                                <td class="category">religious</td>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="report"></td>
                                <td class="category">report</td>
                            </tr>
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="romance"></td>
                                <td class="category">romance</td>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="thriller"></td>
                                <td class="category">thriller</td>
                            </tr>
                            <tr>
                                <td class="checkbox_field"><input type="checkbox" class="category" name="youth"></td>
                                <td class="category">youth</td>
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
        props:  ['author', 'book_id', 'book_title', 'book_description', 'book_comedy', 'book_fantasy', 'book_for_kids', 'book_history', 'book_moral', 'book_philosophy', 'book_religious', 'book_report', 'book_romance', 'book_thriller', 'book_youth'],
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
                count1: 1000,
                count2: 100,
                count3: 3,
                green: false,
                red: true,
                step1: true,
                step2: true,
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
                    this.green = false;
                    this.red = true;
                    return this.count1 = 1000 - this.description.length;
                }
                if (this.description.length >= 50 && this.description.length < 1000) {
                    this.green = true;
                    this.red = false;
                    return this.count1 = 1000 - this.description.length;
                }
            },
            /* counting signs in the title field*/
            titleCount(){
                this.checkStep1();
                if (this.title.length < 100 && this.title.length >= 2) {
                    this.green = true;
                    this.red = false;
                    return this.count2 = 100 - this.title.length;
                }
                if (this.title.length == 100 || this.title.length < 2) {
                    this.green = false;
                    this.red = true;
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
                this.count3 = 3-this.counter;
                this.checkStep2();
                return this.count3;
                }
            },
            onSubmit() {
                axios.post('/books', this.$data)
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

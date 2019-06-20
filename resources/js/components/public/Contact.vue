<template>
<span id="contact-us">
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>ฝากข้อความถึงเรา</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><router-link to="/contact"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
              <li class="active">ติดต่อเรา</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <form role="form" class="contactForm">
              <div class="row">
                <div class="span4 form-group">
                  <input type="text" v-model="form.contact_name" name="contact_name" class="form-control" id="name" :class="{ 'is-invalid': form.errors.has('contact_name') }" placeholder="Your Name" data-rule="minlen:4"  />
                    <has-error :form="form" field="contact_name"></has-error>
                </div>
                <div class="span4 form-group">
                  <input type="email" v-model="form.contact_email" name="contact_email" class="form-control" id="email" :class="{ 'is-invalid': form.errors.has('contact_email') }" placeholder="Your Email" data-rule="email"  />
                      <has-error :form="form" field="contact_email"></has-error>
                </div>
                <div class="span4 form-group">
                  <input type="text" v-model="form.contact_subject" name="contact_subject" class="form-control" id="subject" :class="{ 'is-invalid': form.errors.has('contact_subject') }" placeholder="Subject" data-rule="minlen:4"  />
                      <has-error :form="form" field="contact_subject"></has-error>
                </div>
                <div class="span12 margintop10 form-group">
                  <textarea v-model="form.contact_message" name="contact_message" class="form-control" rows="12" :class="{ 'is-invalid': form.errors.has('contact_message') }" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <has-error :form="form" field="contact_message"></has-error>
                  <p class="text-center">
                    <button @click.prevent="saveContact()" class="btn btn-large btn-theme margintop10" type="submit">Submit message</button>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</span>
</template>

<script>
export default {
    name: "Contact",

    data() {
        return {
            form: new Form({
                contact_name:       '',
                contact_email:      '',
                contact_subject:    '',
                contact_message:    '',
            })
        }
    },

    methods: {
        saveContact() {
            this.form.post('/save-contact').then(() => {
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'เราได้รับข้อความของคุณเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 3000
                })

                this.$router.push('/')
            })
        },
    },
}
</script>

<style scoped>
    .btn-theme {
        border: 1px solid #F03C02;
        background: #F03C02;
    }
    .btn-theme:hover {
        border: 1px solid #333333;
        background: #333333;
    }

    .help-block, .help-inline {
        color: red;
        font-size: 1.6em;

    }
</style>

<form id="graffitiContactForm" class="graffiti-contact-form" action="#" method="post" data-url="<?= admin_url('admin-ajax.php'); ?>">

    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control graffiti-form-control" placeholder="Your Name">
        <small class="form-control-msg invalid-feedback">Your Name is required</small>
    </div>

    <div class="form-group">
        <input type="email" name="email" id="email" class="form-control graffiti-form-control" placeholder="Your Email">
        <small class="form-control-msg invalid-feedback">Your Email is required</small>
    </div>

    <div class="form-group">
        <textarea name="message" id="message" class="form-control graffiti-form-control"></textarea>
        <small class="form-control-msg invalid-feedback">Your Message is required</small>
    </div>

    <button type="submit" class="btn btn-danger">Submit</button>
    <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
    <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
    <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>

</form>
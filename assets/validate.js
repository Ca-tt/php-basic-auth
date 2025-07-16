// import { isStrongPassword, isEmail } from "validator";

let emailLogin = $(".email-input-login");
console.log("🚀 ~ emailLogin:", emailLogin)
let emailSignup = $(".email-input-signup");
console.log("🚀 ~ emailSignup:", emailSignup)


emailLogin.on("input", function () {
    let email = $(this).val();
    console.log('- email -', email);

    let isEmail = validator.isEmail(email);
    console.log('isEmail:', isEmail);
})


emailSignup.on("input", function () {
    let isEmail = validator.isEmail(email);
    console.log('isEmail:', isEmail);
})

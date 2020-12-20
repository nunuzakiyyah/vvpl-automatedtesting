module.exports = {

    url: 'http://localhost/ScholarSeeker/Landing/login',

    elements: {
        signinBtn: by.xpath("//button[normalize-space()='SIGN IN']")
    },

    performClick: function () {

        var selector = page.signinBtn.elements.signinBtn;
        return driver.findElement(selector).click();
    }
};

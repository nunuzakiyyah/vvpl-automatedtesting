module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/login',

    elements: {
        signinBtn: by.xpath("//button[normalize-space()='SIGN UP']")
    },

    performClick: function () {

        var selector = page.signinBtn.elements.signinBtn;
        return driver.findElement(selector).click();
    }
};

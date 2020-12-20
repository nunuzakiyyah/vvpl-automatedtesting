module.exports = {

    url: 'http://localhost/ScholarSeeker/Landing/login',

    elements: {
        fieldEmail: by.xpath("//input[@placeholder='email']")
    },

    performFill: function () {

        var selector = page.fieldEmail.elements.fieldEmail;
        return driver.findElement(selector).sendKeys(shared.id.email);
    }
};

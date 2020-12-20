module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/login',

    elements: {
        fieldpw: by.xpath("//input[@placeholder='Password']")
    },

    performFill: function () {

        var selector = page.fieldpw.elements.fieldpw;
        return driver.findElement(selector).sendKeys(shared.id_register.pw);
    }
};

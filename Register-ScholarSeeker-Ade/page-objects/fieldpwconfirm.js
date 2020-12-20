module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/login',

    elements: {
        fieldpwconfirm: by.xpath("//input[@placeholder='Confirm Password']")
    },

    performFill: function () {

        var selector = page.fieldpwconfirm.elements.fieldpwconfirm;
        return driver.findElement(selector).sendKeys(shared.id_register.pwconfirm);
    }
};

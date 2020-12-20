module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/register',

    elements: {
        fieldEmail_Register: by.xpath("//input[@placeholder='email']")
    },


    performFill: function () {
        var selector = page.fieldEmail_Register.elements.fieldEmail_Register;
        return driver.findElement(selector).sendKeys(shared.id_register.email);
    }
};

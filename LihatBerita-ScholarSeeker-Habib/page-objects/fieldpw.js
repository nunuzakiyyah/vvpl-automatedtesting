module.exports = {

    url: 'http://localhost/ScholarSeeker/Landing/login',

    elements: {
        fieldpw: by.xpath("//input[@id='pwd']")
    },

    performFill: function () {

        var selector = page.fieldpw.elements.fieldpw;
        return driver.findElement(selector).sendKeys(shared.id.pw);
    }
};

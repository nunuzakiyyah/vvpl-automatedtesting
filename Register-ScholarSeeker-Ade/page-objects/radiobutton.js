module.exports = {

    url: 'http://192.168.64.2/ScholarSeeker/Landing/login',

    elements: {
        radiobutton: by.xpath("//label[normalize-space()='Mahasiswa']")
    },

    performClick: function () {

        var selector = page.radiobutton.elements.radiobutton;
        return driver.findElement(selector).click();
    }
};

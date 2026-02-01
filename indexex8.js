function HtmlElement() {
    this.click = function() {
        console.log("Clicked!");
    };
}

HtmlElement.prototype.focus = function() {
    console.log("Focused!");
};

function HtmlSelectElement(items = []) {
    this.items = items;

    this.addItem = function(item) {
        this.items.push(item);
    };

    this.removeItem = function(item) {
        const index = this.items.indexOf(item);
        if (index > -1) {
            this.items.splice(index, 1);
        }
    };
}

HtmlSelectElement.prototype = new HtmlElement();

HtmlSelectElement.prototype.constructor = HtmlSelectElement;

HtmlSelectElement.prototype.render = function() {
    const optionsHTML = this.items.map(item => `<option>${item}</option>`).join('');
    return `<select>${optionsHTML}</select>`;
};

function HtmlImageElement(src) {
    this.src = src;
}

HtmlImageElement.prototype = new HtmlElement();
HtmlImageElement.prototype.constructor = HtmlImageElement;

HtmlImageElement.prototype.render = function() {
    return `<img src="${this.src}" />`;
};  

const img = new HtmlImageElement('https://example.com/cat.png');

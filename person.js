class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    saymyname() {
        return `Hello, my name is ${this.name}`;
    }
}

module.exports = {
    Person,
};

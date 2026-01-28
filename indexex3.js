// bài 1
const address = {
  street: "123 Le Loi",
  city: "Ho Chi Minh",
  zipCode: "700000"
};
function showAddress(address) {
  for (let key in address) {
    console.log(key + ":", address[key]);
  }
}

showAddress(address);

// bài 2
function createAddress(street, city, zipCode) {
  return {
    street,
    city,
    zipCode
  };
}

const address1 = createAddress("456 Nguyen Trai", "Ha Noi", "100000");
console.log(address1);

function Address(street, city, zipCode) {
  this.street = street;
  this.city = city;
  this.zipCode = zipCode;
}

const address2 = new Address("789 Tran Hung Dao", "Da Nang", "550000");
console.log(address2);

// bài 3

function Address(street, city, zipCode) {
  this.street = street;
  this.city = city;
  this.zipCode = zipCode;
}

const address3 = new Address("x", "y", "z");
const address4 = new Address("x", "y", "z");

function areSame(address3, address4) {
  return address3 === address4;
}

function areEqual(address3, address4) {
  return (
    address3.street === address4.street &&
    address3.city === address4.city &&
    address3.zipCode === address4.zipCode
  );
}

console.log(areSame(address3, address4 ));   // false
console.log(areEqual(address3, address4));  // true

//bài 4
const blogPost = {
  title: "Học cách đi lên từ 2 bàn tay trắng",
  body: "Bài viết này hướng dẫn cách khỏi đi học vẫn giàu",
  author: "Phú Quốc",
  views: 120,
  comments: [
    {
      author: "An",
      body: "Bài viết dễ hiểu 👍"
    },
    {
      author: "Bình",
      body: "Rất hữu ích, cảm ơn!"
    }
  ],
  isLive: true
};

console.log(blogPost);

// bài 5 
function Post(title, body, author) {
  this.title = title;
  this.body = body;
  this.author = author;
  this.views = 0;
  this.comments = [];
  this.isLive = false;
}

const post1 = new Post(
  "Học JavaScript",
  "Constructor Function trong JS",
  "Phú Quốc"
);

console.log(post1);
//bài 6 
const priceRanges = [
  {
    label: "$",
    price: "Inexpensive",
    min: 0,
    max: 100
  },
  {
    label: "$$",
    price: "Moderate",
    min: 101,
    max: 300
  },
  {
    label: "$$$",
    price: "Expensive",
    min: 301,
    max: 1000
  }
];

console.log(priceRanges);

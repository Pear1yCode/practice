package question.constructor.normal.one;

public class BookDTO {
    private String title;
    private String publisher;
    private String author;
    private int price;
    private double discountRate;



    // 기본
    public BookDTO () {}

    // 세개
    public BookDTO (String title, String publisher, String author) {
        this.title = title;
        this.publisher = publisher;
        this.author = author;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setPublisher(String publisher) {
        this.publisher = publisher;
    }

    public void setAutor(String author) {
        this.author = author;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public void setDiscountRate (double discountRate) {
        this.discountRate = discountRate;
    }

    // 구분

    public String getTitle() {
        return title;
    }
    public String getPublisher () {
        return publisher;
    }
    public String getAuthor () {
        return author;
    }
    public int getPrice () {
        return price;
    }
    public double getDiscountRate () {
        return discountRate;
    }

    // 전부초기화
    public BookDTO (String title, String publisher, String author, int price, double discountRate) {
        this.title=title;
        this.publisher=publisher;
        this.author=author;
        this.price=price;
        this.discountRate=discountRate;
    }

    public String printInformation() {
        return (title + ", " + publisher +", " +author +", " + price +", " + discountRate);
    }
}

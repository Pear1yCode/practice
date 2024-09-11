package question.constructor.normal.one;

public class Application {
    public static void main(String[] args) {

        // mb 기본생성자
        BookDTO dto = new BookDTO();
//        System.out.print(dto.getTitle() +", " + dto.getPublisher() +", " + dto.getAuthor() +", " + dto.getPrice() +", " + dto.getDiscountRate());
        System.out.println(dto.printInformation());

        // 세개의 필드 초기화?
        BookDTO dto1 = new BookDTO("자바의 정석", "도우출판", "남궁성");
        System.out.println(dto1.printInformation());

        // 전부 초기화

        BookDTO dto2 = new BookDTO("홍길동전", "활빈당", "허균", 5000000, 0.5);
        System.out.println(dto2.printInformation());
    }
}

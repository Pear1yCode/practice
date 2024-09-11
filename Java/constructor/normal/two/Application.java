package question.constructor.normal.two;

import java.util.Scanner;

public class Application {
    public static void main(String[] args) {

        StudentDTO dto = new StudentDTO();
        Scanner sc = new Scanner(System.in);
        System.out.println("학년 입력");
        int grade = sc.nextInt();

        System.out.println("반 입력");
        int classroom = sc.nextInt();

        System.out.println("이름 입력");
        String name = sc.next();

        System.out.println("키 입력");
        double height = sc.nextDouble();

        System.out.println("성별 입력");
        char gender = sc.next().charAt(0);

        StudentDTO dto1 = new StudentDTO(grade, classroom, name, height, gender);
        dto1.printInformation();
    }
}

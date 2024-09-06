package question.Java.looping;

import java.util.Scanner;

public class for_Application6 {
    public void allPlus () {
        /* 정수를 입력받아 1부터 입력받은 정수까지
         * 홀수이면 "수", 짝수이면"박"이 정수만큼 누적되어 출력되게 작성하시오.
         *
         * -- 입력 예시 --
         * 정수를 입력하세요 : 5
         *
         * -- 출력 예시 --
         * 수박수박수
         * */
        System.out.print("정수를 입력하세요 : ");
        Scanner sc = new Scanner(System.in);
        int number = sc.nextInt();
//        char at = sc_next().charAt();
//        String answer = "";
//        do {
//            answer = sc.nextLine();
//            System.out.println(answer);
//        } while answer
//

//        for (i = 1; i <= number; i++) {
//            if (number % 2 == 0) {
//                System.out.println("박");
//            } else if (number % 2 !=0) {
//                System.out.println("수");
//            } else {
//                System.out.println("0은 입력할 수 없습니다.");
//            }
//            System.out.println(i);
//        }
//        i = 1;
//        do {
//            if (number % 2 == 0) {
//                System.out.println("박");
//            } else if (number % 2 !=0) {
//                System.out.println("수");
//            } else {
//                System.out.println("0은 입력할 수 없습니다.");
//            }
//            i++;
//        } while (i <= number);
        for (int i = 1; i <= number; i++) {
            if (i % 2 == 0) {
                System.out.print("박");
            } else if (i % 2 != 0) {
                System.out.print("수");
            } else {
                System.out.print("0은 안돼");
            }
        }
    }
}

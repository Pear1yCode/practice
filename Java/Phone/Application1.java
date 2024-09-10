package Java.Phone;

import java.util.Scanner;

public class Application1 {
    //        메뉴 4개,
    //        1. 휴대폰 켜기
    //        2. 패턴풀기
    //        3. 어플 실행 - 3-1 어플 종료 , 3-2 핸드폰 종료
    //        4. 휴대폰 종료
    //
    //        휴대폰 켜져있는지 꺼져있는지 불리언 값
    //        패턴이 풀려있는지 안풀려있는지 불리언 값
    //        휴대폰 끄면 패턴 다시 잠금

    public static void main(String[] args) {
        Person person = new Person();
        Scanner sc = new Scanner(System.in);

        while (true) { // for문으로?
            System.out.println("==========  휴대폰 기능  ==========");
            System.out.println("1. 휴대폰 전원 켜기");
            System.out.println("2. 휴대폰 패턴 해제");
            System.out.println("3. 앱 실행");
            System.out.println("4. 휴대폰 전원 종료");
            int answerNumber = sc.nextInt();

            switch (answerNumber) {
                case 1 :
                    person.on();
                    break;
                case 2 :
                    person.unlock();
                    break;
                case 3 :
                    person.app();
                    System.out.println("1. 앱 종료, 2. 휴대폰 종료");
                    int answerNumber2 = sc.nextInt();
                    if (answerNumber2 == 1) {
                        person.appEnd();
                        System.out.println("앱을 종료합니다.");
                    } else {
                        person.off();
                        System.out.println("휴대폰을 종료합니다.");
                        break;
                    }
                    break;
                case 4 :
                    person.off();
                    break;
                default :
                    System.out.println("휴대폰을 종료합니다.");
                    break;
            }
        }
    }
}
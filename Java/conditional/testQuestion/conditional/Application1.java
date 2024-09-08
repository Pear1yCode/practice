package Java.testQuestion.conditional;

import java.util.Scanner;

public class Application1 {
    public static void main(String[] args) {
        /*
        1. apple, 2. banana 라는 선택지에서 1, apple을 선택하거나 2, banana를 선택해도
            인식되는 제어문을 생성하시오. (숫자든 문자열이든 선택하면 똑같이 나오게)
            출력문 :
            선택하신 것은 apple입니다.
            선택하신 것은 banana입니다.
         */

        System.out.println("1. apple와 2. banana 중 한가지를 고르시오");
        Scanner sc = new Scanner(System.in);
        String fruit = sc.nextLine();

        switch (fruit) {
            case "1" :
            case "apple" :
                System.out.println(fruit + "입니다.");
                break;
            case "2" :
            case "banana" :
                System.out.println(fruit + "입니다.");
                 break;
        }
    }
}

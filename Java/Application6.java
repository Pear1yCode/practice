package question.Java;

import java.util.Scanner;

public class Application6 {
    public static void main(String[] args) {
        /* 과일 이름("apple", "banana", "melon", "grape") 중 한 가지를 문자열로 입력하면
         * 해당하는 가격에 맞게 상품명과 가격이 출력되게 하세요.
         * 단, 목록에 없는 과일을 입력 시 "준비된 상품이 없습니다." 출력 후 프로그램 종료
         *
         * -- 상품 가격 --
         * apple :  1000원
         * banana : 3000원
         * melon : 2000원
         * grape : 5000원
         *
         * -- 입력 예시 --
         * 과일 이름을 입력하세요 : banana
         *
         * -- 출력 예시 --
         * banana의 가격은 3000원 입니다.
         * */
        System.out.println("과일을 입력하세요.  apple   banana     melon    grape   택 1 ");
        Scanner sc = new Scanner(System.in);
        String fruit = sc.nextLine();

        String name = "";
        int price = 0;

//        switch (fruit) {
//            case "apple" :
//                name ="apple";
//                price = 1000;
//                break;
//            case "banana" :
//                name = "banana";
//                price = 3000;
//                break;
//            case "melon" :
//                name = "melon";
//                price = 2000;
//                break;
//            case "grape" :
//                name = "grape";
//                price = 5000;
//                break;
//            default :
//                System.out.println("준비된 상품이 없습니다.");
//        }
//        System.out.println("선택한 과일은 " + name + " 이며 가격은 " + price + " 원 입니다." );


        if (fruit.equals("apple")){
            System.out.println(fruit + " : 1000 원");
        } else if (fruit.equals("banana")){
            System.out.println(fruit + ": 3000원");
        } else if (fruit.equals("melon")){
            System.out.println(fruit + " : 2000원");
        } else if (fruit.equals("grape")){
            System.out.println(fruit + " : 5000원");
        } else {
            System.out.println("준비된 상품이 없습니다.");
        }
    }
}

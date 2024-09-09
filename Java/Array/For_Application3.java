package question.Array;

public class For_Application3 {
    public void go () {
        String[] shapes = {"SPADE", "CLOVER", "HEART", "DIAMOND"};
        String[] numbers = {"2", "3", "4", "5", "6", "7", "8", "9", "10", "JACK", "QUEEN", "KING", "ACE"};

        int randomShapes = (int) (Math.random()*shapes.length);
        int randomShapes2 = (int) (Math.random()*shapes.length);

        int randomnumbers = (int) (Math.random()*numbers.length);
        int randomnumbers2 = (int) (Math.random()*numbers.length);

        String shape = shapes[randomShapes];
        String number = numbers[randomnumbers];

        String shape2 = shapes[randomShapes2];
        String number2 = numbers[randomnumbers2];

        System.out.println("첫 번째로 뽑은 카드는 " + shape + " " +  number);
        System.out.println("첫 번째로 뽑은 카드는 " + shape2 + " " + number2);

        if (shape.equals(shape2)) {
            System.out.println("축하합니다! 두 장의 카드가 같은 모양입니다.");
        } else {
            System.out.println("아쉽습니다. 다른 모양의 카드입니다.");
        }
    }
}

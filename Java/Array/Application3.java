package question.Array;

public class Application3 {
    public static void main(String[] args) {
        //다음은 카드 게임에서 사용되는 카드 4개의 모양과 13개의 숫자를 표현한 배열입니다.
        //이 배열을 활용하여 카드 두 장을 무작위로 뽑고, 뽑은 두 장의 카드가 같은 모양인지 확인한 후,
        //같은 모양이라면 “축하합니다! 두 장의 카드가 같은 모양입니다.“라는 메시지를 출력하는 프로그램을 작성하세요.
        //만약 다른 모양이라면 “아쉽습니다. 다른 모양의 카드입니다.“라는 메시지를 출력하세요.
        //
        //예시
        //첫 번째로 뽑은 카드는 SPADE 7 카드입니다.
        //두 번째로 뽑은 카드는 SPADE ACE 카드입니다.
        //축하합니다! 두 장의 카드가 같은 모양입니다.

        For_Application3 fa3 = new For_Application3();
        fa3.go();
    }
}

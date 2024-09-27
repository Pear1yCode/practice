package Question.Q1;

import java.util.ArrayList;

public class lottoArr {

        public ArrayList<Integer> lottoArr() {
            ArrayList<Integer> loArr = new ArrayList <>();
            int count = 0;
            while (count < 7) {
                int lotto = (int) (Math.random() * 51) + 1;
                loArr.add(lotto);
                count ++;
            }
            return loArr;
    }

}

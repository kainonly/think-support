package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type DeleteOperate struct{}

func (r *DeleteOperate) PostDelete() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}

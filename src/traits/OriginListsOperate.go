package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type OriginListsOperate struct{}

func (r *OriginListsOperate) PostOriginLists() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
